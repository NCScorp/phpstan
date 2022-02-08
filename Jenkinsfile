node('main'){
    stages{
        stage("building..."){
            agent {
                any { 
                    image 'node:16.13.1-alpine'
                }
            }
        }
        
        stage('Test') {
            steps {
                sh 'node --version'
            }
        }
    }
}
