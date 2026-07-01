"use strict";

import {Request, Response, NextFunction} from "express";
import findUser from "./findUser";
import loginLog from "./loginLog";

export default async ( request : Request, response : Response, next : NextFunction )=> {
    const headers = request.headers.authorization || '';

    if ( !headers || headers === '' ) {
        response.sendStatus( 401 );
        return;
    }

    const [ _type, payload ] = headers.split( ' ' );

    const credentials = Buffer.from( payload, 'base64' ).toString( 'ascii' );
    const [ username, password ] = credentials.split( ':' );

    const user = findUser( username, password );

    if ( user ) {
        await loginLog( user.username, request.url, request.method );
    } else {
        response.sendStatus( 401 );
        return;
    }
    next();
}