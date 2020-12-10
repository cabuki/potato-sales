import $ from 'jquery';
import dt from 'datatables.net';

$(document).ready(
    function ()
    {
        let sales = $('div#sales');

        sales.html("<h3>loading...</h3>");

        $.get(
            sales.data('url'),
            null,
            function ( d )
            {
                sales.html(d.data);

                // Build the table with headers
                let table = $('<table id="sales_data" class="display"></table>');
                let thead = $('<thead></thead>');
                let tbody = $('<tbody></tbody>');
                let tr1 = $('<tr></tr>');
                let tr2 = $('<tr></tr>');

                let cols = [];

                // Get the columns
                for ( const c in d.data.column )
                {
                    let col = d.data.column[c];
                    let rspan = ( col.hasOwnProperty('subHeaders') ) ? 1 : 2;
                    let cspan = ( col.hasOwnProperty('subHeaders') ) ? col.subHeaders.length : 1;

                    // If it has a field, then use it for the data
                    if ( col.hasOwnProperty('field') )
                    {
                        cols.push( { "data" : col.field } );
                    }
                    else if ( col.header == 'Total sales' )
                    {
                        // If it's total sales column, add a 'total' column to the data
                        cols.push( { "data" : "total" } );
                    }

                    // Add the column
                    tr1.append( $("<th></th>").attr("rowspan", rspan).attr("colspan",cspan).html(col.header) )

                    // Process any subheaders
                    if ( col.hasOwnProperty('subHeaders') )
                    {
                        for ( const s in col.subHeaders )
                        {
                            let sc = col.subHeaders[s];
                            tr2.append( $("<th></th>").html(sc.header) )

                            if ( sc.hasOwnProperty('field') )
                            {
                                cols.push( { "data" : sc.field } );
                            }
                        }
                    }
                }

                table.append( thead.append(tr1).append(tr2) );

                sales.html('').append(table);

                let data = [];

                // Calculate the totals for each product
                for( const _d in d.data.data )
                {
                    let _dt = d.data.data[_d];
                    _dt.total = _dt.salesQ1 + _dt.salesQ2 + _dt.salesQ3 + _dt.salesQ4;
                    data.push( _dt );
                }

                // Setup datatables to handle the data
                table.DataTable(
                    {
                        "data": data,
                        "columns": cols,
                        "paging": false,
                        "searching": false,
                    }
                )
            }
        );
    }
);