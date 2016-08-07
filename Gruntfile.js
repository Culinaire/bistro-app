module.exports = function(grunt){

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    copy: {
      bootstrap: {
        expand: true,
        cwd: 'bower_components/bootstrap/dist/',
        src: ['css/bootstrap.css','css/bootstrap-theme.css', 'fonts/**', 'js/bootstrap.js'],
        dest: 'public/assets/',
      },
      jquery: {
        expand: true,
        cwd: 'bower_components/jquery/dist/',
        dest: 'public/assets/js/',
        src: ['jquery.js']
      }
    },
    sass: {
      dist: {
        options: {
          sourcemap: 'none'
        },
        files: {
          'public/assets/css/app.css': 'resources/assets/sass/app.scss',
          'public/assets/css/public.css': 'resources/assets/sass/public.scss',
          'public/assets/css/dashboard.css': 'resources/assets/sass/dashboard.scss'
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-sass');

  grunt.registerTask('default', ['sass']);
  grunt.registerTask('publish:assets', ['copy:bootstrap', 'copy:jquery']);
}
