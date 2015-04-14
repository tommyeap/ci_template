module.exports = function (grunt) {
    'use strict';
    // Project configuration
    grunt.initConfig({
        // Metadata
        pkg: grunt.file.readJSON('package.json'),
        banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
            '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
            '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
            '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
            ' Licensed <%= props.license %> */\n',
		/**
		* Destination for build files
		*/
		distdir: {
			distribution: ['public/dist']
		},
		
		src: {
			BowerComp: ['bower_components'],
			NodeComp: ['node_modules'],
			CustomJs: ['public/js']
		},
		
				/**
		* Clean/delete up folder files specific below
		*/
		clean: {
			build: ['<%= distdir.distribution %>/js/*'],
			options: {
				force: true
			}
		},
        // Task configuration
        /*copy: {
          require: {
            files: [
              {
                expand: true, 
                src: 'require.js',
                cwd: 'bower_components/requirejs/',
                dest: 'public/vendors/js/', 
                filter: 'isFile'
              }
            ],
          },
          jquery: {
            files: [
              {
                expand: true, 
                src: 'jquery.js',
                cwd: 'bower_components/jquery/dist/',
                dest: 'public/vendors/js/', 
                filter: 'isFile'
              }
            ],
          },
          jValidator: {
            files: [
              {
                expand: true, 
                src: 'jquery.validate.js',
                cwd: 'bower_components/jquery-validation/dist/',
                dest: 'public/vendors/js/', 
                filter: 'isFile'
              }
            ],
          },
          angular: {
            files: [
              {
                expand: true, 
                src: 'angular.js',
                cwd: 'bower_components/angular/',
                dest: 'public/vendors/js/', 
                filter: 'isFile'
              }
            ],
          },
          bootstrap: {
            files: [
              {
                expand: true, 
                src: 'bootstrap.js',
                cwd: 'bower_components/bootstrap/dist/js',
                dest: 'public/vendors/js/', 
                filter: 'isFile'
              },
              {
                expand: true, 
                src: 'bootstrap.css',
                cwd: 'bower_components/bootstrap/dist/css',
                dest: 'public/vendors/css/', 
                filter: 'isFile'
              }
            ]
          }
        },*/
        concat: {
            //js: {
            //    src: ['public/vendors/**/*.js', 'public/js/**/*.js'],
            //    dest: 'public/dist/dist.js'
            //},
            css: {
                src: ['public/vendors/css/**/*.css', 'public/css/**/*.css'],
                dest: 'public/dist/css/dist.css'
            }
        },
        uglify: {
            dist: {
              files: {
                'public/dist/dist.min.js': ['public/dist/dist.js']
              }
            }
        },
        cssmin: {
            dist: {
              files: {
                'public/dist/css/dist.min.css': ['public/dist/css/dist.css']
              }
            }
        },
        jshint: {
            options: {
                node: true,
                curly: true,
                eqeqeq: true,
                immed: true,
                latedef: true,
                newcap: true,
                noarg: true,
                sub: true,
                undef: true,
                unused: true,
                eqnull: true,
                browser: true,
                globals: { jQuery: true },
                boss: true
            },
            gruntfile: {
                src: 'gruntfile.js'
            },
            lib_test: {
                src: ['public/js/**/*.js']
            },
            beforeconcat: ['<%= src.CustomJs %>/controllers/testModule.js']
        },
        watch: {
            js: {
                files: ['public/js/**/*.js'],
                tasks: ['concat:js']
            },
            css: {
                files: ['public/css/**/*.css'],
                tasks: ['concat:css']
            },
            gruntfile: {
                files: '<%= jshint.gruntfile.src %>',
                tasks: ['jshint:gruntfile']
            },
            lib_test: {
                files: '<%= jshint.lib_test.src %>',
                tasks: ['jshint:lib_test', 'qunit']
            }
        },
		requirejs: {
			compile: {
				options: {
					// Read requirejs config so we do not need duplicate same config for build
					mainConfigFile: '<%= src.CustomJs %>/require.config.js',
					//_' + (new Date()).getTime() + 
					out: '<%= distdir.distribution %>/js/dist.min.js',

					include: ['../../../<%= src.BowerComp %>/requirejs/require.js'],

					preserveLicenseComments: false,

				}
			}
		}
    });

    // These plugins provide necessary tasks
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-requirejs');
    //grunt.loadNpmTasks('grunt-contrib-copy');

    // Default task
    grunt.registerTask('default', ['clean']);
	grunt.registerTask('release', ['clean', 'concat:css', 'cssmin', 'requirejs']);
	grunt.registerTask('js', ['clean', 'requirejs']);
	grunt.registerTask('unittest', ['jshint:beforeconcat']);
};

