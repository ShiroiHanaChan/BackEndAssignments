"use strict";

import {Request, Response, NextFunction} from "express";
import * as jwt from 'jsonwebtoken';
import {secretKey} from "./loginAuth";

// Use with loginAuth

interface Decode {
    "username": string,
    "role": string,
    "iat": number,
    "exp": number
}

export default ( request : Request, response : Response, next : NextFunction ) => {
    const authHeader = request.headers.authorization || '';
    console.log( 'Header:', authHeader );

    if ( !authHeader ) {
        return response.status( 401 ).json( { "message": "Unauthorized!" } );
    }

    const token = authHeader.split( ' ' )[1];
    console.log( 'Token:', token );
    console.log( 'Secret:', secretKey );

    jwt.verify( token, secretKey, ( error, decoded : Decode ) => {

        if ( error ) {
            console.error( error );
            return response.status( 401 ).json( { "message": "You aren't logged in!" } );
        }

        // Currying
        Object.assign( request, { username: decoded.username, role: decoded.role } )
        next();
    } );
}