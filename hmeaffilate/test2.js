
<script>
(function () {
  // --- CONFIG ---------------------------------------------------------------
  const CONFIG = {
    modalId: 'successModal',
    shareButtonId: 'shareButton',          // <a id="shareButton" ...>
    textareaId: 'whatsappMessage',         // <textarea id="whatsappMessage">
    onlyRunInChrome139: false,             // set true if you only want to run under 139
    autoOpenModalForTest: true,            // try to open modal for visibility tests
    expectedBootstrapModalZ: 1050,         // expected z-index of .modal
  };

  // --- UTILITIES ------------------------------------------------------------
  const results = [];
  const push = (ok, msg, extra = null) => {
    const entry = { ok, msg, extra };
    results.push(entry);
    const tag = ok ? '✅' : '❌';
    if (extra) {
      console[ok ? 'log' : 'warn'](`${tag} ${msg}`, extra);
    } else {
      console[ok ? 'log' : 'warn'](`${tag} ${msg}`);
    }
  };

  function parseChromeVersion(ua) {
    // Handles Chrome/139.0.7258.143 and Chromium variants
    const m = ua.match(/(?:Chrome|Chromium)\/(\d+)\.(\d+)\.(\d+)\.(\d+)/);
    if (!m) return null;
    return {
      major: parseInt(m[1], 10),
      minor: parseInt(m[2], 10),
      build: parseInt(m[3], 10),
      patch: parseInt(m[4], 10),
      toString() { return `${this.major}.${this.minor}.${this.build}.${this.patch}`; }
    };
  }

  function createPanel() {
    const panel = document.createElement('div');
    panel.id = 'debug-panel';
    panel.style.cssText = `
      position: fixed; bottom: 16px; right: 16px; width: 360px; max-height: 70vh;
      background: #111; color: #eee; border: 1px solid #444; border-radius: 8px;
      font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
      font-size: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); z-index: 999999;
      display: flex; flex-direction: column; overflow: hidden;
    `;
    panel.innerHTML = `
      <div style="display:flex; align-items:center; justify-content:space-between; padding:8px 10px; background:#1a1a1a; border-bottom:1px solid #333;">
        <strong>Chrome 139 Debug</strong>
        <div>
          <button id="dbg-close" style="background:#333;border:0;color:#ddd;padding:4px 8px;border-radius:4px;cursor:pointer;">Close</button>
        </div>
      </div>
      <div id="dbg-body" style="overflow:auto; padding:10px;"></div>
      <div style="padding:8px 10px; background:#141414; border-top:1px solid #333;">
        <button id="dbg-copy" style="background:#2a6ef2;border:0;color:#fff;padding:6px 10px;border-radius:4px;cursor:pointer;">Copy report</button>
      </div>
    `;
    document.body.appendChild(panel);
    panel.querySelector('#dbg-close').onclick = () => panel.remove();
    panel.querySelector('#dbg-copy').onclick = () => {
      const text = results.map(r => `${r.ok ? 'OK' : 'FAIL'} | ${r.msg}${r.extra ? '\n  ' + JSON.stringify(r.extra, null, 2) : ''}`).join('\n');
      navigator.clipboard.writeText(text).then(() => alert('Debug report copied.'));
    };
    return panel.querySelector('#dbg-body');
  }

  function flushToPanel(container) {
    const html = results.map(r => {
      const color = r.ok ? '#6fdc8c' : '#ff6b6b';
      const extra = r.extra ? `<pre style="white-space:pre-wrap;background:#0e0e0e;padding:6px;border-radius:6px;color:#ddd;">${escapeHtml(JSON.stringify(r.extra, null, 2))}</pre>` : '';
      return `<div style="margin:6px 0;">
        <span style="color:${color};font-weight:bold;">${r.ok ? '✅' : '❌'}</span>
        <span style="margin-left:6px;">${escapeHtml(r.msg)}</span>
        ${extra}
      </div>`;
    }).join('');
    container.innerHTML = html;
  }

  function escapeHtml(s) {
    return String(s).replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]));
  }

  function getComputedZIndex(el) {
    return Number(getComputedStyle(el).zIndex || 0);
  }

  function hasStackingContext(el) {
    const cs = getComputedStyle(el);
    // Common stacking context creators
    const creators = [
      cs.transform !== 'none',
      cs.perspective !== 'none',
      cs.filter && cs.filter !== 'none',
      cs.position === 'fixed',
      cs.willChange && /transform|filter|perspective/.test(cs.willChange),
      cs.zIndex !== 'auto' && (cs.position === 'relative' || cs.position === 'absolute' || cs.position === 'sticky')
    ];
    return creators.some(Boolean);
  }

  function auditAncestorsForStacking(el) {
    const issues = [];
    let n = el.parentElement;
    while (n && n !== document.body) {
      if (hasStackingContext(n)) {
        issues.push({
          node: n.tagName.toLowerCase() + (n.id ? `#${n.id}` : ''),
          zIndex: getComputedStyle(n).zIndex,
          transform: getComputedStyle(n).transform,
          position: getComputedStyle(n).position,
          filter: getComputedStyle(n).filter
        });
      }
      n = n.parentElement;
    }
    return issues;
  }

  // --- BEGIN TESTS ----------------------------------------------------------
  const panelBody = createPanel();

  // 1) Browser detection
  const ua = navigator.userAgent;
  const v = parseChromeVersion(ua);
  if (v) {
    push(true, `Detected Chrome version: ${v.toString()}`);
    if (CONFIG.onlyRunInChrome139 && v.major !== 139) {
      push(false, `Skipping: not Chrome 139 (detected ${v.toString()})`);
      flushToPanel(panelBody);
      return;
    }
  } else {
    push(false, 'Not Chrome (or UA parsing failed)', { ua });
  }

  // 2) Modal element checks
  const modal = document.getElementById(CONFIG.modalId);
  if (!modal) {
    push(false, `Modal #${CONFIG.modalId} not found. Check the ID.`);
    flushToPanel(panelBody);
    return;
  }
  push(true, `Modal #${CONFIG.modalId} found.`);

  // 3) Ensure modal is direct child of <body>
  if (modal.parentNode !== document.body) {
    push(false, 'Modal is not a direct child of <body>. This can cause z-index/stacking issues in newer Chrome.', {
      parentTag: modal.parentNode && modal.parentNode.tagName,
      suggest: 'Move modal HTML so it is appended directly under <body>, or programmatically re-append it.'
    });
  } else {
    push(true, 'Modal is a direct child of <body>.');
  }

  // 4) Bootstrap CSS presence (basic check for .modal styles applied)
  const modalDisplay = getComputedStyle(modal).display;
  const hasBootstrapModalStyle = modal.classList.contains('modal') && modalDisplay === 'none' || modalDisplay === 'block';
  if (!hasBootstrapModalStyle) {
    push(false, 'Bootstrap CSS may not be applied to modal.');
  } else {
    push(true, 'Bootstrap CSS appears present.');
  }

  // 5) Stacking context audit
  const stackingIssues = auditAncestorsForStacking(modal);
  if (stackingIssues.length) {
    push(false, 'Ancestor stacking contexts detected (transform/filter/position/z-index may hide modal).', stackingIssues);
  } else {
    push(true, 'No problematic ancestor stacking contexts detected.');
  }

  // 6) Auto-open modal (optional) to test visibility
  function openTestModal() {
    // Create a backdrop if not present
    let backdrop = document.getElementById('debug-backdrop');
    if (!backdrop) {
      backdrop = document.createElement('div');
      backdrop.id = 'debug-backdrop';
      backdrop.className = 'modal-backdrop fade show';
      backdrop.style.zIndex = '1040';
      document.body.appendChild(backdrop);
    }
    modal.style.display = 'block';
    modal.classList.add('show');
    modal.removeAttribute('aria-hidden');
    modal.setAttribute('aria-modal', 'true');
    // Lock body
    document.body.classList.add('modal-open');
    document.body.style.overflow = 'hidden';

    // Visibility checks
    const z = getComputedZIndex(modal);
    const rect = modal.getBoundingClientRect();
    const inViewport = rect.width > 0 && rect.height > 0 && rect.bottom > 0 && rect.right > 0 && rect.left < window.innerWidth && rect.top < window.innerHeight;

    push(true, `Modal display: ${getComputedStyle(modal).display}, classList contains "show": ${modal.classList.contains('show')}`);
    push(z >= CONFIG.expectedBootstrapModalZ, `Modal z-index is ${z} (expected >= ${CONFIG.expectedBootstrapModalZ})`, { zIndex: z });

    if (!inViewport) {
      push(false, 'Modal not in viewport (position/transform issue?).', { rect });
    } else {
      push(true, 'Modal appears in viewport.', { rect });
    }
  }

  if (CONFIG.autoOpenModalForTest) {
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', openTestModal);
    } else {
      openTestModal();
    }
  }

  // 7) WhatsApp link encoding checks
  const shareBtn = document.getElementById(CONFIG.shareButtonId);
  const ta = document.getElementById(CONFIG.textareaId);
  if (!ta) {
    push(false, `Textarea #${CONFIG.textareaId} not found.`);
  } else {
    const rawText = ta.value || '';
    const normalized = rawText.replace(/\r\n|\r|\n/g, '\n');
    const jsEncoded = encodeURIComponent(normalized);     // like PHP rawurlencode
    const plusEncoded = normalized.split(' ').join('+');  // naive urlencode space handling

    const href = shareBtn ? shareBtn.getAttribute('href') : null;
    const decodedOnce = href ? decodeURIComponent(href) : null;

    // Detect double encoding: if decoding once still contains %NN sequences that would decode to ASCII
    const doubleEncoded = href ? /%(25)[0-9A-Fa-f]{2}/.test(href) : false;

    push(true, 'WhatsApp encoding test generated (JS side).', {
      sampleFirst80: normalized.slice(0, 80),
      encodeURIComponent_first80: jsEncoded.slice(0, 120),
      href,
      decodedOnce_first120: decodedOnce ? decodedOnce.slice(0, 120) : null,
      doubleEncodedLikely: doubleEncoded
    });

    if (doubleEncoded) {
      push(false, 'WhatsApp URL looks double-encoded. Ensure you use rawurlencode once and avoid HTML-encoding before building the href.');
    } else {
      push(true, 'WhatsApp URL does not appear double-encoded.');
    }
  }

  // 8) Backdrop presence & body lock
  const hasBackdrop = !!document.querySelector('.modal-backdrop.show');
  push(hasBackdrop, 'Backdrop present when modal is open.');
  const bodyLocked = document.body.classList.contains('modal-open') && getComputedStyle(document.body).overflow === 'hidden';
  push(bodyLocked, 'Body scroll locked while modal open.');

  // 9) Final: flush to panel
  flushToPanel(panelBody);
})();
</script>