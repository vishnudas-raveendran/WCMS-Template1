cd docker
choice="${1}" 
case ${choice} in 
   "start")
     docker-compose up
      ;; 
   "stop") DIR="${2}" 
     docker-compose down -v --remove-orphans
      ;; 
   "restart")  
    docker-compose restart
      ;; 
    *)
    echo -e "Oops ! No arguments recieved\nPlease run with any of the following : start | stop | restart"  
esac
