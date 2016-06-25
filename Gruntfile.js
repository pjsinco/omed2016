module.exports = function(grunt) {

  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.loadNpmTasks("grunt-autoprefixer");
  grunt.loadNpmTasks("grunt-contrib-sass");
  grunt.loadNpmTasks("grunt-notify");
  grunt.loadNpmTasks("grunt-grunticon");

  grunt.initConfig({

    grunticon: {
      icons: {
        files: [
          {
            expand: true,
            cwd: 'images/svg',
            src: ["*.svg", '*.png'],
            dest: 'dist/grunticon',
          },
        ],
        options: {
          enhanceSVG: true,
          pngpath: 'images/png',
          colors: {
            yellow: '#fcef06',
            warmgray: '#babbb1',
            red: '#cb333b',
            purple: '#9063cd',
            teal: '#00b0b9',
            white: '#fff',
            gray: '#808080',
            mediumgray: '#b3b3b3',
            lightgray: '#ddd',
            extralightgray: '#f5f5f5',
            verydark: '#666666',
          }
        },
      },
    },

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
    
    }, // watch

  }); // initConfig
  
  //grunt.registerTask('grunticon', ['grunticon']);
  grunt.registerTask('default', ['watch']);

}; // exports

