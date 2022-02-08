pipeline{
  agent any
  stages{
    stage('ok'){
      steps{
        echo 'ok'
      }
    }
  }
  post{
    always{
      emailext body: 'A test email', recipientProviders: [[$class: 'DevelopersRecipientProvider']], subject: 'Test'
    }
  }
}