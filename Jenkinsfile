node() {

    stage('Clean') {
        echo "deleteDir()"
    }

    stage('Fetch') {
        timeout(time: 60, unit: 'SECONDS') {
            checkout scm
        }
    }

    stage('Config'){
        sh 'rm -rf build/logs'  
        sh 'mkdir -p build/logs'
    }

    stage('COde Analyser'){
        docker.image("jakzal/phpqa").inside("-v /root/.ssh:/root/.ssh") {
    
        }   
        parallel (
            "PhpMetrics": {
                sh 'docker run --rm -v $(pwd):/project -w /project jakzal/phpqa phpmetrics --report-html=report.html src/ || exit 0'
                publishHTMLReport('build/logs', 'report.html', 'PHPMetrics')
            },

            "PHPCodeSniffer": {
                sh 'docker run --rm -v $(pwd):/project -w /project jakzal/phpqa phpcs --report=full --report-file=build/logs/checkstyle.txt --standard=PSR2 --encoding=UTF-8 --ignore="*.js" src/  || exit 0'
            },
        )
    }     
    stage('Email'){
        echo "enviando para email"
    }
}

def publishHTMLReport(reportDir, file, reportName) {
    if (fileExists("${reportDir}/${file}")) {
        publishHTML(target: [
            allowMissing         : true,
            alwaysLinkToLastBuild: true,
            keepAll              : true,
            reportDir            : reportDir,
            reportFiles          : file,
            reportName           : reportName
        ])
    }    
}
