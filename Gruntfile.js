module.exports = function(grunt) {

  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.loadNpmTasks("grunt-autoprefixer");
  grunt.loadNpmTasks("grunt-contrib-sass");
  grunt.loadNpmTasks("grunt-notify");

  grunt.initConfig({

    sass: {
      dist: {
        options: {
          sourcemap: 'none',
        },
        files: [{
          expand: true,
          cwd: 'sass',
          src: ['**/*.scss'],
          dest: '.',
          ext: '.css',
        }],
      },
    },

    notify: {
      sass: {
        options: {
          title: 'Sass',
          message: 'Sassed!'
        },
      },
    },

    autoprefixer: {
      css: {
        src: './**/*.css'
      },
    },

    watch: {
      options: {
        livereload: true,
      },
      
      sass: {
        files: ['**/*.scss'],
        tasks: ['sass:dist', 'notify:sass', 'autoprefixer:css'],
      },

      php: {
        files: ['**/*.php'],
        options: {
          livereload: 35729,
        },
      },
    
    } // watch

  }); // initConfig
  
  grunt.registerTask('default', ['watch']);

}; // exports

