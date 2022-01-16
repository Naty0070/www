import React, { Component } from 'react'
import Form from 'react-bootstrap/Form';

export default class FormNumber extends Component {
    constructor(props) {
        super(props); 
        this.state = { 
            cl: this.props.classes};
        
      } 
    handleChangeNum=(event)=>{
        this.props.onInputChange(event.target.value)
    }
    render() {
        return (
            <div className={this.state.cl}>
                <h4>Jakou cenu si představujete?</h4>
                <Form className="mt-3">
                    <Form.Control 
                    type="number" 
                    onChange={(event)=>
                    this.handleChangeNum(event)} 
                    value={this.props.num}
                    min="0"/>
                </Form>

                <p>{this.props.comparison}</p>
            </div>
        )
    }
}
