"use strict";

import express, {Request, Response} from 'express';
import users from '../fixtures/users.json';
import generateID from "../lib/generateID";
import verifyAuth from "../lib/verifyAuth";

interface User {
    "id": number,
    "name": string,
    "age": number,
    "username": string,
    "password": string,
    "role": string
}

const usersRouter = express.Router();

const getUsersRoute = ( request : Request, response : Response ) => {
    if ( request.body.role === 'admin' ) {
        response.status( 200 ).json( users );
    } else {
        const passwordless = users.map( ( user : User ) => {
            const { password, ...rest } = user;
            return rest;
        } )
        response.status( 200 ).json( passwordless );
    }
}

const getUserRoute = ( request : Request, response : Response ) => {
    const params = Number(request.params.id);
    const user = users.find( user => user.id === params );
    if ( user ) {
        response.status( 200 );
        response.json( user );
    } else {
        response.status( 404 );
        response.json( { "message": "User not found!" } );
    }
}

const createUserRoute = ( request : Request, response : Response ) => {
    if ( users.some( taken => taken.username === request.body.username ) ) {
        response.status( 406 );
        response.send( { "message": "Username taken!" } );
        return;
    }

    const newUser : User = {
        "id": generateID(),
        ...request.body
    }

    users.push( newUser );

    response.status( 201 );
    response.json( users[ users.length - 1 ] );
}

usersRouter.use( verifyAuth );
usersRouter.route( '/' )
        .get( getUsersRoute )
        .post( createUserRoute );

usersRouter.route( '/:id' )
        .get( getUserRoute )

export default usersRouter;