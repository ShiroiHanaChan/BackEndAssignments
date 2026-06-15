"use strict";

/*import { Request } from "../types/requestResponse";

export async function parseRequestBody (
    request : Request
) : Promise<void> {

    let dataBuffer : Buffer[] = [];
    const chunkLoader = async () : Promise<void> =>
        { request.on( 'data', chunk => dataBuffer.push( chunk ) ) };

    request.on( 'end', () => {
        const body = Buffer.concat( dataBuffer ).toString( 'utf8' );
        returnBuffer = JSON.parse( dataBuffer );
        return returnBuffer;
    } );
}*/

const patterns : URLPatterns = {
    capture: /\/([a-zA-Z0-9_-]+)(?:\/([a-zA-Z0-9_-]+))?\/?$/
}

export function analyzeURL (
    url : string = '/'
) : string[] | string {
    const match : RegExpMatchArray | null = url.match( patterns.capture );
    return match ? [ match[1], match[2] ] : '';
}