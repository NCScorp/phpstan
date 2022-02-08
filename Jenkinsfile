
pipeline {
    stages{
        stage("building... "){
            agent {
                docker {
                    image 'node:6-alpine'
                    args '-p 3000:3000'
                }
            }
        }
        stage("test"){
            echo "Opa, foi pro teste"
        }
    }
}