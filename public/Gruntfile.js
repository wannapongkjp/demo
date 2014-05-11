module.exports = function(grunt) {
	'use strict';

	// Project configuration.
	grunt.initConfig({
		bump : {
			options : {
				files : [ 'package.json' ],
				updateConfigs : [],
				commit : true,
				commitMessage : 'Release v%VERSION%',
				commitFiles : [ 'package.json' ], // '-a' for all files
				createTag : false,
				tagName : 'v%VERSION%',
				tagMessage : 'Version %VERSION%',
				push : true,
				pushTo : 'origin master',
				gitDescribeOptions : '--tags --always --abbrev=1 --dirty=-d'
			}
		},

		clean: {
			build: ["dist/static"]
		},

		//concat css, js
		concat : {
			options : {},
			js : {
				files : '<%= concatTask.js.files %>'
			},
			css : {
				files : '<%= concatTask.css.files %>'
			}
		},

		//minify js
		uglify : {
			options : {
				report : 'min'
			},
			js : {
				files : '<%= minifyTask.js.files %>'
			},
			vendor_js : {
				files : '<%= minifyTask.vendor.js.files %>'
			}
		},

		recess : {
			options : {
				compile : true,
			},
			less : {
				files : '<%= lessTask.less.files %>'
			},
			less_min : {
				options : {
					compress : true
				},
				files : '<%= lessTask.less.min.files %>'
			}
		},

		//copy assets folder
		copy : {
			assets : {
				expand : true,
				src : "static/assets/**",
				dest : 'dist'
			}
		},

		//auto compilation
		watch : {
			build_less : {
				files : [ 'static/less/**' ],
				tasks : [ 'build-less' ]
			},
			build_js : {
				files : [ 'static/js/**' ],
				tasks : [ 'build-js' ]
			}
		}

	});

	// These plugins provide bumping version.
	grunt.loadNpmTasks('grunt-bump');

	// These plugins provide compile css, js files.
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-recess');

	grunt.registerTask('build-js', [ 'build-task-js' ]);
	grunt.registerTask('build-less', [ 'build-task-less' ]);

	// By default, run all tests.
	grunt.registerTask('default', [ 'clean', 'build-js', 'build-less', 'copy' ]);

	// ----------------------------- Build js ------------------------------
	// TASK: Concatenating and minify js files
	grunt.registerTask('build-task-js', 'Concatenating and minify js files', function() {
		var fs = require('fs');
		var base_dir = "static/js";
		var files = {};
		var min_files = {};
		// get all files inside directory
		function getFiles(dir) {
			var files = fs.readdirSync(dir).filter(function(v){ return /\.js/.test(v); });
			var tmp_files = [];
			for ( var i = 0; i < files.length; i++) {
				tmp_files[i] = dir + "/" + files[i];
			}
			return tmp_files;
		}
		// list all directories
		fs.readdirSync(base_dir).forEach(function(p) {
			var dir = base_dir + "/" + p;
			if(fs.lstatSync(dir).isDirectory()){
				var items = getFiles(dir);
				files["dist/static/js/" + p + ".js"] = items;
				min_files["dist/static/js/" + p + ".min.js"] = items;
			}
		});
		grunt.config.set('concatTask.js.files', files);
		grunt.task.run('concat:js');
		grunt.config.set('minifyTask.js.files', min_files);
		grunt.task.run('uglify:js');
	});
	// ----------------------------------- BUILD LESS ------------------------------
	// TASK: 'Concatenating and minify less files
	grunt.registerTask('build-task-less', 'Concatenating and minify less files', function() {
		var fs = require('fs');
		var base_dir = "static/less";
		var files = {};
		var min_files = {};
		// get all files inside directory
		function getFiles(dir) {
			var files = fs.readdirSync(dir).filter(function(v){ return /\.less/.test(v); });
			var tmp_files = [];
			for ( var i = 0; i < files.length; i++) {
				tmp_files[i] = dir + "/" + files[i];
			}
			return tmp_files;
		}
		// list all directories
		fs.readdirSync(base_dir).forEach(function(p) {
			var dir = base_dir + "/" + p;
			if(fs.lstatSync(dir).isDirectory()){
				var items = getFiles(dir);
				files["dist/static/css/" + p + ".css"] = items;
				min_files["dist/static/css/" + p + ".min.css"] = items;
			}
		});
		grunt.config.set('lessTask.less.files', files);
		grunt.task.run('recess:less');
		grunt.config.set('lessTask.less.min.files', min_files);
		grunt.task.run('recess:less_min');
	});
};