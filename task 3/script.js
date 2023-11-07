document.getElementById('start').addEventListener('click', function() {
    var urls = [
        document.getElementById('url1').value,
        document.getElementById('url2').value,
        document.getElementById('url3').value
    ];
    var interval = document.getElementById('interval').value * 1000;
    var frame = document.getElementById('slideshowFrame');
    var i = 0;

    setInterval(function() {
        frame.src = urls[i];
        i = (i + 1) % urls.length;
    }, interval);

    frame.style.display = 'block';
});

