"use strict";

import * as sql from 'mysql2/promise';
import {readFile} from "./fileSystem";

const config = async () => JSON.parse( await readFile( 'config.json' ) );
const credentials = await config();

const pool = sql.createPool (
    {
        ...credentials,
        waitForConnections: true,
        connectionLimit: 10,
        maxIdle: 10,
        idleTimeout: 60000,
        queueLimit: 10,
        enableKeepAlive: true
    }
)

export async function returnQuery (
    query : string
)  {
    try {
        const [ rows, fields ] = await pool.query( query );
        return [ rows, fields ];
    } catch ( error ) {
        throw new Error( String( error ) )
    }
}

export async function closePool (
) : Promise<void> {
    await pool.end();
}