"use strict";

import express from 'express';

import usersRouter from "./routes/usersRouter";
import loginRouter from "./routes/loginRouter";

const app = express();
const port = 3000;

app.use( express.json() );
app.use( '/users', usersRouter );
app.use( '/login', loginRouter );

app.listen( port, () => console.log( 'Listening on port: ', port ) );