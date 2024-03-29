var syntax        = 'sass', // выберете используемый синтаксис sass или scss, и перенастройте нужные пути в файле gulp.js и папки в вашего шаблоне wp
		gulpversion   = '4'; // Выберете обязателньо свою версию Gulp: 3 или 4

var gulp          = require('gulp'),
    autoprefixer  = require('gulp-autoprefixer'),
    browsersync   = require('browser-sync'),
    concat        = require('gulp-concat'),
    cache         = require('gulp-cache'),
    cleancss      = require('gulp-clean-css'),
    ftp           = require('vinyl-ftp'),
		imagemin      = require('gulp-imagemin'),
		notify        = require('gulp-notify'),
		pngquant      = require('imagemin-pngquant'),
		gutil         = require('gulp-util' ),
		rename        = require('gulp-rename'),
		rsync         = require('gulp-rsync'),
		sass          = require('gulp-sass')(require('sass')),
		uglify        = require('gulp-uglify');

	
// Незабываем менять 'wp-gulp.loc' на свой локальный домен
gulp.task('browser-sync', function() {
	browsersync({
		proxy: "eduguru.loc:8888",
		notify: false,
		// open: false,
		// tunnel: true,
		// tunnel: "gulp-wp-fast-start", //Demonstration page: http://gulp-wp-fast-start.localtunnel.me
	})
});


// Обьединяем файлы sass, сжимаем и переменовываем
gulp.task('styles', function() {
	return gulp.src('src/wp-content/themes/eduguru/assets/sass/*.sass')
	.pipe(sass({
        style: 'compressed',
        errLogToConsole: false,
        onError: function(err) {
            return notify().write(err);
        }
    }))
	//.pipe(rename({ suffix: '.min', prefix : '' }))
	.pipe(concat('style.min.css'))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } })) // Opt., comment out when debugging
	.pipe(gulp.dest('src/wp-content/themes/eduguru/assets/css'))
	.pipe(browsersync.stream())
});

gulp.task('styles-home', function() {
	return gulp.src('src/wp-content/themes/eduguru/assets/sass/home-page/*.sass')
	.pipe(sass({
        style: 'compressed',
        errLogToConsole: false,
        onError: function(err) {
            return notify().write(err);
        }
    }))
	//.pipe(rename({ suffix: '.min', prefix : '' }))
	.pipe(concat('style-home.min.css'))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } })) // Opt., comment out when debugging
	.pipe(gulp.dest('src/wp-content/themes/eduguru/assets/css'))
	.pipe(browsersync.stream())
});

gulp.task('styles-empty', function() {
	return gulp.src('src/wp-content/themes/eduguru/assets/sass/empty-page/*.sass')
	.pipe(sass({
        style: 'compressed',
        errLogToConsole: false,
        onError: function(err) {
            return notify().write(err);
        }
    }))
	//.pipe(rename({ suffix: '.min', prefix : '' }))
	.pipe(concat('style-empty.min.css'))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } })) // Opt., comment out when debugging
	.pipe(gulp.dest('src/wp-content/themes/eduguru/assets/css'))
	.pipe(browsersync.stream())
});


// Обьединяем файлы скриптов, сжимаем и переменовываем
gulp.task('scripts', function() {
	return gulp.src([
		//'src/wp-content/themes/eduguru/assets/libs/jquery/dist/jquery-3.6.0.min.js',
		'src/wp-content/themes/eduguru/assets/libs/js/ajax.js',
		'src/wp-content/themes/eduguru/assets/libs/js/more-btn.js',
		'src/wp-content/themes/eduguru/assets/libs/js/fixwidth.js',
		//'src/wp-content/themes/eduguru/assets/libs/js/menu.js',
		//'src/wp-content/themes/twentyseventeen/assets/js/common.js', // Always at the end
		])
	.pipe(concat('scripts.min.js'))
	// .pipe(uglify()) // Mifify js (opt.)
	.pipe(gulp.dest('src/wp-content/themes/eduguru/assets/js'))
	.pipe(browsersync.reload({ stream: true }))
});

gulp.task('scripts-home', function() {
	return gulp.src([
		//'src/wp-content/themes/eduguru/assets/libs/jquery/dist/jquery-3.6.0.min.js',
		'src/wp-content/themes/eduguru/assets/libs/js/home/category.js',
		'src/wp-content/themes/eduguru/assets/libs/js/home/swiper.js',
		])
	.pipe(concat('scripts-home.min.js'))
	// .pipe(uglify()) // Mifify js (opt.)
	.pipe(gulp.dest('src/wp-content/themes/eduguru/assets/js'))
	.pipe(browsersync.reload({ stream: true }))
});

// сжимаем картинки в папке images в шаблоне, и туда же возвращаем в готовом виде
gulp.task('imgmin-theme', function() {
	return gulp.src('src/wp-content/themes/eduguru/assets/images/**/*')
	.pipe(cache(imagemin())) // Cache Images
	.pipe(gulp.dest('src/wp-content/themes/eduguru/assets/images'));
});


// сжимаем картинки в папке uploads, и туда же возвращаем в готовом виде
gulp.task('imgmin-uploads', function() {
	return gulp.src('src/wp-content/uploads/**/*')
	.pipe(cache(imagemin())) // Cache Images
	.pipe(gulp.dest('src/wp-content/uploads'));
});


// Отгрузка всего сайта на хостинг
gulp.task('deploy-site', function() { 
	var conn = ftp.create({
		host:      '11.111.111.111', // or domain
		user:      'user ftp',
		password:  'password ftp',
		parallel:  10,
		log: gutil.log
	});
	var globs = [
	'src/**', // Путь до готовой папки вашего сайта к отгрузки на хостинг
	//'src/.htaccess',
	];
	return gulp.src(globs, {buffer: false})
	.pipe(conn.dest('/www/domain.com/')); // Путь до папки сайта на хостинге
});


// Отгрузка только шаблона на хостинг
gulp.task('deploy-theme', function() {
	var conn = ftp.create({
		host:      'a304639.ftp.mchost.ru', // or domain
		user:      'a304639_a239912',
		password:  'Od13Uy0mN1',
		parallel:  10,
		log: gutil.log
	});
	var globs = [
	'src/wp-content/themes/eduguru/**', // Путь до шаблона у вас на компьютере
	];
	return gulp.src(globs, {buffer: false})
	.pipe(conn.dest('/httpdocs/wp-content/themes/eduguru/')); // Путь до шаблона на хостинге
});


// Отгрузка или всего сайта, или какой то папки по SSH, настроите нужный путь сами
gulp.task('rsync', function() { 
	return gulp.src('src/**')
	.pipe(rsync({
		root: 'src/',
		hostname: 'user123@domain.com',
		destination: 'www/domain.com/',
		// include: ['*.htaccess'], // Hidden files to include in the deployment
		recursive: true,
		archive: true,
		silent: false,
		compress: true
	}));
	// Documentation: https://pinchukov.net/blog/gulp-rsync.html
});


if (gulpversion == 3) {
  gulp.task('watch', ['styles', 'scripts', 'browser-sync'], function() {
	  gulp.watch(['src/wp-content/themes/eduguru/assets/sass/**/*.sass'], ['styles']); // Наблюдение за sass файлами в папке sass в теме
	  gulp.watch(['src/wp-content/themes/eduguru/assets/libs/**/*.js', 'src/wp-content/themes/eduguru/assets/js/common.js'], ['scripts']); // Наблюдение за JS файлами js в теме
    gulp.watch('src/wp-content/themes/eduguru/**/*.php', browsersync.reload) // Наблюдение за sass файлами php в теме
  });
  gulp.task('default', ['watch']);
}


if (gulpversion == 4) {
	gulp.task('watch', function() {
		gulp.watch('src/wp-content/themes/eduguru/assets/sass/*.sass', gulp.parallel('styles')); // Наблюдение за sass файлами в папке sass в теме
		gulp.watch('src/wp-content/themes/eduguru/assets/sass/home-page/*.sass', gulp.parallel('styles-home')); 
		gulp.watch('src/wp-content/themes/eduguru/assets/sass/empty-page/*.sass', gulp.parallel('styles-empty')); 
		gulp.watch(['src/wp-content/themes/eduguru/assets/libs/**/*.js', 'src/wp-content/themes/eduguru/assets/js/common.js'], gulp.parallel('scripts'), gulp.parallel('scripts-home')); // Наблюдение за JS файлами в папке js
    gulp.watch('src/wp-content/themes/eduguru/**/*.php', browsersync.reload) // Наблюдение за sass файлами php в теме
	});
	gulp.task('default', gulp.parallel('styles', 'styles-home', 'styles-empty', 'scripts', 'scripts-home', 'browser-sync', 'watch'));
}
