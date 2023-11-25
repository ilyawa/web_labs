const gulp = require("gulp");
const browserSync = require("browser-sync").create();

function task1(cb) {
    setTimeout(cb, 3000);
}

function task2(cb) {
    setTimeout(cb, 3000);
}

gulp.task("browserSync", function () {
    browserSync.init({
        server: {
            baseDir: "./",
        },
        //startPath: "/test.html"
    });

    gulp.watch("*.html").on("change", browserSync.reload);
    gulp.watch("*.css").on("change", browserSync.reload);
    gulp.watch("*.php").on("change", browserSync.reload);
});

gulp.task("default", gulp.series("browserSync"));
//exports.default = gulp.parallel(task1, task2);
//exports.default = gulp.series(task1, task2);