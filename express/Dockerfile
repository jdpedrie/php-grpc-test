FROM node:10

WORKDIR /usr/src/app
COPY package.json .
COPY echo.proto .
COPY express.js .
RUN npm install
EXPOSE 8081
CMD ["npm", "start"]
