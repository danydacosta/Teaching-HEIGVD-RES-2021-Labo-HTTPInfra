FROM node:latest

COPY src /opt/app

WORKDIR /opt/app
RUN npm install # Install dep. in package.json

CMD ["node", "/opt/app/index.js"]
