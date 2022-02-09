node() {
    ansiColor('xterm') {

        stage('Checkout') {
            checkout scm
        }

        stage('Pulling') {
            sh 'docker pull jakzal/phpqa'
        }

        stage('Prepare directory') {
            sh 'docker run --rm -v $(pwd):/. -w /. jakzal/phpqa chmod -R 777 build'
            sh 'rm -rf build/logs'
            sh 'mkdir -p build/logs'
        }

        stage('Install dependencies') {
            sh 'docker run --rm -v $(pwd):/. -w /. jakzal/phpqa composer install --ignore-platform-reqs --no-scripts --no-progress --no-suggest'
        }

        stage("Testing") {
            parallel (
                "PHPCodeSniffer": {
                    sh 'docker run --rm -v $(pwd):/. -w /. jakzal/phpqa phpcs --report=checkstyle --report-file=build/logs/checkstyle.xml --standard=PSR2 --encoding=UTF-8 --ignore="*.js" src/  || exit 0'
                    replaceFilePath('build/logs/checkstyle.xml')
                    checkstyle pattern: 'build/logs/checkstyle.xml'
                },

                "PHPStan": {
                    sh 'docker run --rm -v $(pwd):/. -w /. jakzal/phpqa phpstan analyse src/ || exit 0'
                },

                "PhpMetrics": {
                    sh 'docker run --rm -v $(pwd):/. -w /. jakzal/phpqa phpmetrics --report-html=build/logs/phpmetrics.html src/ || exit 0'
                    publishHTMLReport('build/logs', 'phpmetrics.html', 'PHPMetrics')
                },

                "PHPMessDetector": {
                    sh 'docker run --rm -v $(pwd):/. -w /. jakzal/phpqa phpmd src/ xml cleancode,codesize,unusedcode --reportfile build/logs/pmd.xml || exit 0'
                    replaceFilePath('build/logs/pmd.xml')
                    pmd canRunOnFailed: true, pattern: 'build/logs/pmd.xml'
                },

                "PHPMagicNumberDetector": {
                    sh 'docker run --rm -v $(pwd):/. -w /. jakzal/phpqa phpmnd src/ --exclude=tests --progress --non-zero-exit-on-violation --ignore-strings=return,condition,switch_case,default_parameter,operation || exit 0'
                },

                "PHPCopyPasteDetector": {
                    sh 'docker run --rm -v $(pwd):/. -w /. jakzal/phpqa phpcpd --log-pmd build/logs/pmd-cpd.xml src/ || exit 0'
                    replaceFilePath('build/logs/pmd-cpd.xml')
                    dry canRunOnFailed: true, pattern: 'build/logs/pmd-cpd.xml'
                }
            )
        }
    }
}

def replaceFilePath(filePath) {
    sh "sed -i 's#/./#${workspace}/#g' ${filePath}"
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
