pipeline{
    stages{
        stage("funciona..."){
            echo "opa, foi!"
        }
        post{
            success {
                mail(from: "nepirel815@rippb.com",
                        to: "ncscorp@protonmail.com",
                        subject: "That build passed.",
                        body: "Nothing to see here")
            }

            failure {
                mail(from: "nepirel815@rippb.com",
                        to: "ncscorp@protonmail.com",
                        subject: "That build failed!",
                        body: "Nothing to see here")
            }
        }
    }
}