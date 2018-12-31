const grpc = require('grpc');
const Service = grpc.load('echo.proto').Service;
const client = new Service('grpc_server:8080', grpc.credentials.createInsecure());

//rando str
const msg = () => Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);

const express = require('express');
const app = express();
const port = 8081;

app.get('/echo', (req, res) => {
 client.echo({ message: msg() }, (err, response) => {
    if (!err) {
      res.json(response);
    } else {
      res.json(err);
    }
  });
});

app.listen(port, () => console.log(`Example app listening on port ${port}!`))
