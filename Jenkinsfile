stage 'Checkout'
 node() {
  notifyStarted()
  deleteDir()
  checkout scm
  notifySuccessful()
 }
def notifyStarted() {
 slackSend (color: '#372466', message: "Start: Job '${env.JOB_NAME} [${env.BUILD_NUMBER}]' (${env.BUILD_URL})")
}

def notifySuccessful() {
  slackSend (color: '#00FF00', message: "SUCCESSFUL: Job '${env.JOB_NAME} [${env.BUILD_NUMBER}]' (${env.BUILD_URL})")
  }