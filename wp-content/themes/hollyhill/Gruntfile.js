/*
Usage
--------------
# run build tasks is build_state (default dev)
# start watching for changes and build on changes
grunt


# build with compressed css and js
# does NOT start watch
grunt prod

Project Setup
--------------
# install grunt for this project (generates ./node_modules)
# run from within this directory
npm install

# NOTE: Machine Setup (heading below) must have occurred
# at least once previously on this machine


Machine Setup
--------------
# install nodejs from
http://nodejs.org/download/

# from the command line install grunt cli
sudo npm install -g grunt-cli

# from the commdand line install sass
sudo gem install sass
*/

    // we can set our default build state to either
    // 'prod' or 'dev'
    // this value will be used for both the
    // initial process when `grunt` alone is run
    // as well as the tasks run via watch
var build_state = 'prod',
    // sass src files are loaded with sass includes
    // no need to list them here (i.e. only one sass src)
    sass_files = {
        "assets/css/theme.min.css": "assets/sass/theme.scss",
        "assets/css/bootstrap.min.css": "assets/sass/bootstrap.scss"
    },
    // watch all .scss files in our sass directory
    // for changes
    watched_sass_files = [ 'assets/sass/*.scss','assets/sass/**/*.scss', 'assets/sass/**/**/*.scss' ],
    uglify_files = {
        'assets/js/javascript.min.js': [
            //'assets/js/includes/**/*.js',
            'assets/js/javascript.js',
        ],
		'assets/js/bootstrap.min.js': [
            'assets/js/includes/bootstrap.js',
        ]
    },
    watched_js_files = [
        'assets/js/includes/**/*.js',
        'assets/js/*.js',
    ];

module.exports = function(grunt) {
    "use strict";

    grunt.initConfig({
        // `grunt watch`
        watch: {
            compass: {
                files: watched_sass_files,
                tasks: ['compass', 'cssmin'],
                options: {
                    livereload: true,
					config: 'config.rb'
                }
            },
            js: {
                files: watched_js_files,
                tasks: ["uglify:"+build_state],
                options: {
                    livereload: true
                }
            }
        }, // watch

		compass: {                  // Task
			dist: {                   // Target
			  options: {              // Target options
				sassDir: 'assets/sass',
				cssDir: 'assets/css',
				environment: 'production',
			  }
			},
			dev: {                    // Another target
			  options: {
				sassDir: 'assets/sass',
				cssDir: 'assets/css',
			  }
			}
		  },

		  cssmin: {
			  minify: {
				expand: true,
				cwd: 'assets/css/',
				src: ['*.css', '!*.min.css'],
				dest: 'assets/css/',
				ext: '.min.css'
			  }
		},

        uglify: {
            // `grunt uglify:dev`
            dev: {
                files: uglify_files,
                options: {
                    beautify: true,
                    mangle: false
                },
            },
            // `grunt uglify:prod`
            prod: {
                files: uglify_files
            }
        }
		

    });

    // when `grunt` is run, do the following tasks
    // run all tasks associated with build_state
    // (either prod or dev), start watch
    // (note: watch also uses build_state when generating output)
    grunt.registerTask('default', [build_state, 'watch', 'compass']);

    // when `grunt prod` is run, do the following tasks
    grunt.registerTask('prod', [ 'uglify:prod', 'compass']);

    // when `grunt dev` is run, do the following tasks
    grunt.registerTask('dev', ['uglify:dev', 'compass']);

    // load these tasks (necessary to allow use of sass, watch, and uglify
    grunt.loadNpmTasks("grunt-contrib-watch");
    grunt.loadNpmTasks("grunt-contrib-uglify");
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	
};
