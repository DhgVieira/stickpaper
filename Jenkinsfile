stage 'Checkout'
 node() {
  deleteDir()
  checkout scm
  script {
   sh 'php artisan migrate'
  }
 }
