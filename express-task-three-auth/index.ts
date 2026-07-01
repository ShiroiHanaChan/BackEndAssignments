"use strict";

import express from 'express';

import usersRouter from "./routes/usersRouter";
import basicAuth from "./lib/basicAuth";

const app = express();
const port = 3000;

app.use( basicAuth );
app.use( '/users', usersRouter );

app.listen( port, () => console.log( 'Listening on port: ', port ) );