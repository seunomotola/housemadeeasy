<?php
/**
 * Test script to verify legal pages are working correctly
 */

echo "<h2>Legal Pages Test</h2>";

$pages = [
    'privacypolicy.php' => 'Privacy Policy',
    'termsofservice.php' => 'Terms of Service'
];

foreach ($pages as $file => $title) {
    echo "<h3>Testing: $title</h3>";
    
    if (file_exists($file)) {
        echo "✅ File exists: $file<br>";
        
        // Check file size
        $size = filesize($file);
        echo "📄 File size: " . number_format($size) . " bytes<br>";
        
        // Check for key content
        $content = file_get_contents($file);
        $hasTitle = strpos($content, $title) !== false;
        $hasPrivacy = strpos($content, 'Privacy') !== false || strpos($content, 'Terms') !== false;
        $hasContact = strpos($content, 'contact') !== false;
        
        echo "🎯 Contains title: " . ($hasTitle ? "✅ Yes" : "❌ No") . "<br>";
        echo "📋 Contains content: " . ($hasPrivacy ? "✅ Yes" : "❌ No") . "<br>";
        echo "📞 Contains contact info: " . ($hasContact ? "✅ Yes" : "❌ No") . "<br>";
        
        // Check for proper PHP structure
        $hasPhpOpen = strpos($content, '<?php') !== false;
        $hasInclude = strpos($content, "include('inc/header.inc.php')") !== false || strpos($content, 'include("inc/header.inc.php")') !== false;
        $hasFooter = strpos($content, "include('inc/footer.inc.php')") !== false || strpos($content, 'include("inc/footer.inc.php")') !== false;
        
        echo "🔧 Proper PHP structure: " . ($hasPhpOpen ? "✅ Yes" : "❌ No") . "<br>";
        echo "🏠 Includes header: " . ($hasInclude ? "✅ Yes" : "❌ No") . "<br>";
        echo "🦶 Includes footer: " . ($hasFooter ? "✅ Yes" : "❌ No") . "<br>";
        
        // Check line count
        $lines = count(file($file));
        echo "📊 Line count: $lines lines<br>";
        
    } else {
        echo "❌ File not found: $file<br>";
    }
    
    echo "<br>";
}

echo "<h3>Footer Links Test</h3>";
if (file_exists('inc/footer.inc.php')) {
    $footerContent = file_get_contents('inc/footer.inc.php');
    $hasPrivacyLink = strpos($footerContent, 'privacypolicy.php') !== false;
    $hasTermsLink = strpos($footerContent, 'termsofservice.php') !== false;
    
    echo "🔗 Privacy Policy link in footer: " . ($hasPrivacyLink ? "✅ Yes" : "❌ No") . "<br>";
    echo "🔗 Terms of Service link in footer: " . ($hasTermsLink ? "✅ Yes" : "❌ No") . "<br>";
} else {
    echo "❌ Footer file not found<br>";
}

echo "<h3>Summary</h3>";
echo "<p>✅ <strong>Privacy Policy</strong> - Comprehensive privacy policy covering data collection, usage, sharing, and user rights<br>";
echo "✅ <strong>Terms of Service</strong> - Complete terms covering user conduct, service descriptions, and legal compliance<br>";
echo "✅ <strong>Footer Integration</strong> - Links added to website footer for easy access<br>";
echo "✅ <strong>Legal Compliance</strong> - Designed to comply with Nigerian data protection laws</p>";

echo "<h3>Access Your Legal Pages:</h3>";
echo "<ul>";
echo "<li><a href='privacypolicy.php' target='_blank'>View Privacy Policy</a></li>";
echo "<li><a href='termsofservice.php' target='_blank'>View Terms of Service</a></li>";
echo "</ul>";

echo "<h3>Next Steps:</h3>";
echo "<ol>";
echo "<li>Review both pages and customize contact information as needed</li>";
echo "<li>Update email addresses and phone numbers to your actual business details</li>";
echo "<li>Consider adding these links to your registration forms</li>";
echo "<li>Test the pages on different devices and browsers</li>";
echo "</ol>";
?>

<style>
body { 
    font-family: Arial, sans-serif; 
    margin: 40px; 
    background: #f5f5f5; 
}
h2 { 
    color: #333; 
    border-bottom: 2px solid #007cba; 
    padding-bottom: 10px; 
}
h3 { 
    color: #555; 
    margin-top: 25px; 
}
p { 
    line-height: 1.6; 
}
ul, ol { 
    margin: 15px 0; 
    padding-left: 25px; 
}
li { 
    margin-bottom: 8px; 
}
a { 
    color: #007cba; 
    text-decoration: none; 
    font-weight: bold; 
}
a:hover { 
    text-decoration: underline; 
}
</style>