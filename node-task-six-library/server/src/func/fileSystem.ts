"use strict";

import * as fs from 'node:fs/promises';

export async function registerLog (
    url : string[] | string,
    statusCode : number,
    reason : unknown | string
) : Promise<void> {
    const date = [ new Date( Date.now() ).toString(), '\n', '\n' ].join('');
    await fs.appendFile (
        'logs.txt',
        [ url, statusCode, reason, date ].join(' - '),
        'utf8'
    )
}


export async function readFile (
    file : string
) : Promise<string> {
    try {
        return await fs.readFile ( file, 'utf8' );
    } catch ( error ) {
        throw new Error ( String( error ) );
    }
}

export async function loadFavicon (
) {
    const path = [ process.cwd(), 'public', 'favicon.webp' ].join('/');
    return await fs.readFile( path );
}