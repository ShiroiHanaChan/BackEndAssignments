"use strict";

import {Request, Response, NextFunction} from "express";

// Use with basicAuth

interface CheckUser extends Request {
    authorization? : string
}

export default ( request : CheckUser, response : Response, next : NextFunction ) => {
    if ( request.headers.authorization ) {
        next();
        return;
    } else {
        response.sendStatus( 401 );
    }
}