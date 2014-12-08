var build_state = 'dev',
    sass_files = {
        "assets/css/theme.min.css": "assets/sass/theme.scss"
    },
    watched_sass_files = [ 'assets/sass/*.scss' ],
    uglify_files = {
        'assets/js/javascript.min.js': [
            'assets/js/javascript.js',
        ],
        'assets/js/plugins.min.js': [
            'assets/js/plugins/**/*.js',
            'assets/js/plugins/*.js',
            '!assets/js/plugins/selectivizr.min.js'
        ]
    },
    watched_js_files = [
        'assets/js/plugins/*.js',
        'assets/js/*.js',
        '!assets/js/plugins/selectivizr.min.js',
        '!assets/js/javascript.min.js',
        '!assets/js/plugins.min.js'
    ];

module.exports = function(grunt) {
    "use strict";

    grunt.initConfig({
        // `grunt watch`
        watch: {
            compass: {
                files: watched_sass_files,
                tasks: ['compass:'+build_state, 'cssmin:'],
                options: {
                    livereload: true
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
        }, // uglify
        compass: {
            prod: {
                options: {
                    sassDir: 'assets/sass',
                    cssDir: 'assets/css',
                    environment: 'production',
                }
            },
            dev: {
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
        }
    });

    // when `grunt` is run, do the following tasks
    // run all tasks associated with build_state
    // (either prod or dev), start watch
    grunt.registerTask('default', [build_state, 'watch', 'compass']);

    // when `grunt prod` is run, do the following tasks
    grunt.registerTask('prod', ['uglify:prod', 'compass:prod']);

    // when `grunt dev` is run, do the following tasks
    grunt.registerTask('dev', ['uglify:dev', 'compass:dev']);

    // load these tasks (necessary to allow use of sass, watch, and uglify
    grunt.loadNpmTasks("grunt-contrib-watch");
    grunt.loadNpmTasks("grunt-contrib-uglify");
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
};
