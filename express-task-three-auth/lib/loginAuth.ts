"use strict";

import {Request, Response} from "express";
import * as jwt from 'jsonwebtoken';
import loginLog from "./loginLog";
import findUser from "./findUser";

// Use with verifyAuth

export const secretKey = 'tastyPopcorn';

export default async ( request : Request, response : Response ) => {

    const { username, password } = request.body || '';

    if ( !username || username === '' || !password || password === '' ) {
        return response.status( 403 ).json( { "message": "Input username and password!" } );
    }

    const user = findUser( username, password );

    console.log( 'User:', user );

    const payload = {
        "username": user.username,
        "role": user.role
    }

    console.log( 'Payload:', payload );

    const token = jwt.sign( payload, secretKey, { expiresIn: '1h' } );
    console.log( 'Token:', token )

    if ( token && user ) {
        await loginLog( user.username, request.originalUrl, request.method );
        return response.status( 202 ).json( {
            "message": [ 'Welcome', user.name ].join( ' ' ),
            "token": token
        } )
    } else {
        return response.status( 401 ).json( { "message": "Input username and password!" } )
    }
}