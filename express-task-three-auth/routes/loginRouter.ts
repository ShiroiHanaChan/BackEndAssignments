"use strict";

import express from 'express';
import loginAuth from "../lib/loginAuth";

const loginRouter = express.Router();

loginRouter.route( '/' )
    .post( loginAuth );

export default loginRouter;