<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'];

    // الحصول على المسار الحالي للمشروع
    $projectRoot = dirname(__FILE__);

    // تحديد المسار النسبي لبرنامج python.exe وملف test.py
    $pythonPath = escapeshellcmd($projectRoot . '/.venv/Scripts/python.exe');
    $scriptPath = escapeshellcmd($projectRoot . '/test.py');

    // بناء الأمر باستخدام المسارات النسبية
    $command = $pythonPath . ' ' . $scriptPath . ' ' . escapeshellarg($text);
    $output = shell_exec($command . " 2>&1");

    if ($output) {
        echo "<pre>$output</pre>";
    } else {
        echo "Error executing Python script.";
    }
}
?>
