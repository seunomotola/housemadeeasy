<?php 
session_start();
if (!isset($_SESSION['generated_pdf'])) {
    die("No PDF generated.");
}
$filename = $_SESSION['generated_pdf'];
$filepath = realpath($filename);
if ($filepath === false) {
    die("The PDF file path is invalid.");
}
// Check if the file exists
if (!file_exists($filepath)) {
    die("The PDF file does not exist.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PDF Preview</title>
    <script>
        function handleIframeError() {
            document.getElementById('error-message').style.display = 'block';
            document.getElementById('pdf-iframe').style.display = 'none';
        }
        function checkIframeLoad() {
            var iframe = document.getElementById('pdf-iframe');
            var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
            if (iframeDoc && iframeDoc.readyState === 'complete') {
                document.getElementById('error-message').style.display = 'none';
                document.getElementById('pdf-iframe').style.display = 'block';
            } else {
                handleIframeError();
            }
        }
        window.onload = function() {
            var iframe = document.getElementById('pdf-iframe');
            iframe.onload = checkIframeLoad;
            iframe.onerror = handleIframeError;
        }
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf_viewer.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.js"></script>
</head>
<body>
    <h1>PDF Preview</h1>
    <div id="error-message" style="display: none; color: red;">
        Error: The PDF could not be loaded. Please try again later.
    </div>
    <iframe id="pdf-iframe" src="pdfjs/web/viewer.html?file=<?php echo urlencode($filepath); ?>" width="100%" height="600px"></iframe>
    <br>
    <a href="<?php echo $filepath; ?>" download>Download PDF</a>
</body>
</html>
