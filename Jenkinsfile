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
                sh 'docker run --rm -v $(pwd):/project -w /project jakzal/phpqa phpmetrics --report-html=build/logs/report.html > build/logs/phpmetrics-report.html src/ || exit 0'
                publishHTMLReport('build/logs', 'report.html', 'PHPMetrics')
            },

            "PHPCodeSniffer": {
                sh 'docker run --rm -v $(pwd):/project -w /project jakzal/phpqa phpcs --report=full --report-file=build/logs/checkstyle.txt --standard=PSR2 --encoding=UTF-8 --ignore="*.js" src/  || exit 0'
                checkstyle pattern: 'build/logs/checkstyle.xml'
            },


            "PHPMessDetector": {
                sh 'docker run --rm -v $(pwd):/project -w /project jakzal/phpqa phpmd src/ text cleancode,codesize,unusedcode --reportfile build/logs/pmd.txt || exit 0'
                pmd canRunOnFailed: true, pattern: 'build/logs/pmd.txt'
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
