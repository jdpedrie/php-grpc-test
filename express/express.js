const grpc = require('grpc');
const Service = grpc.load('echo.proto').example.Service;
const client = new Service('grpc_server:8080', grpc.credentials.createInsecure());

//rando str
const msg = () => Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);

const express = require('express');
const app = express();
const port = 8081;

app.get('/echo', (req, res) => {
 const message = msg();
 client.echo({ message: message}, (err, response) => {
    if (!err) {
      console.log(response);
      res.send(`Sent ${message} and recieved ${response.message} in ${response.time} ms`);
    } else {
      res.json(err);
    }
  });
});

app.listen(port, () => console.log(`Example app listening on port ${port}!`))
