import React from 'react';
import './App.css';
import ListItem from './component/listItems'
import axios from 'axios'
//import axios from 'axios'

class App extends React.Component{
    state ={
        records:[]
    }

    componentDidMount(){
      this.fetchData();
    }


    async fetchData(){
      let records = await 
              axios.get('http://localhost/rest-test/api/posts/index')
             // console.log(records.data)
          this.setState({records:records.data['data']})
          
    }

    render(){
       // this.fetchData();
      return(
        <div className  ="container">
          <button>New Content</button>
            <ListItem records = {this.state.records}/>
        </div>
      )
    }
}

export default App;
