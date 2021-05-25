FROM node:latest

COPY src /opt/app

WORKDIR /opt/app # Needed for the next command
RUN npm install # Install dependencies in package.json

CMD ["node", "/opt/app/index.js"]
