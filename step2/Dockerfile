FROM node:latest

COPY src/ /opt/app

RUN apt-get update
RUN apt-get install -y tcpdump

WORKDIR /opt/app
RUN npm install 

CMD ["node", "/opt/app/index.js"]
