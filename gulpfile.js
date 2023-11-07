const server = browserSync.create();

function doStuff(){
    server.init({
        server: {
            baseDir: './'
        }
    });
    done();
}