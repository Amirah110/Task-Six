var recognition;

function recordAndConvertSpeech() {
  if ('webkitSpeechRecognition' in window) {
    console.log('تسجيل الصوت مدعوم');
    recognition = new webkitSpeechRecognition();
    recognition.lang = 'en-US';

    recognition.onresult = function(event) {
      var result = event.results[0][0].transcript;
      console.log('النص المحول:', result);
      document.getElementById('output').value = result;
      document.getElementById('saveButton').disabled = false;
    };

    recognition.onerror = function(event) {
      console.error('حدث خطأ في التعرف على الصوت:', event.error);
    };

    document.getElementById('recordButton').addEventListener('click', function() {
      recognition.start();
    });

    document.getElementById('stopButton').addEventListener('click', function() {
      recognition.stop();
    });

    document.getElementById('saveButton').addEventListener('click', function(event) {
      event.preventDefault();
      var text = document.getElementById('output').value;
      saveText(text);
    });
  } else {
    console.log('تسجيل الصوت غير مدعوم في هذا المتصفح.');
  }
}

function saveText(text) {
  $.post('save.php', { text: text }, function(response) {
    console.log(response);
    alert(response); // Display the AI response
  });
}
