pipeline {
  agent any
  stages {
    stage('Migrations') {
      steps {
        sh '''cd stickpaper
php artisan migrate
'''
      }
    }
  }
}