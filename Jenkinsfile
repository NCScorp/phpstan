node('agora-vai'){
    stage('Begin'){
        echo "Passou pelo begin"
    }

    stage('building...'){
        docker.image('node:6-alpine').inside(){
            sh "node --version"
        }
    }
}
