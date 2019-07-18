import React from 'react'
const listItems =({records})=>(
    <table>
            <thead>
              <tr>
                <th>no</th>
                <th>ttle</th>
                <th>content</th>
              </tr>
             
            </thead>
            <tbody>
              {records.map((record,i)=>{
                    return(
                    <tr key={i}>
                      <td>{i + 1}</td>
                        <td>{record.title}</td>
                        <td>{record.content}</td>
                        
                        <td><button>Update</button></td>
                        <td><button>Delete</button></td>
                    </tr>) 
                  })}
            </tbody>
                
          </table>
)

export default listItems