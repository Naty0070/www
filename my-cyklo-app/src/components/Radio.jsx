import React, { Component } from 'react'
import Form from 'react-bootstrap/Form';


export default class Radio extends Component {
    handleChange(holder){
        this.props.onChange(holder);
    }
    render() {
        return (
            <div>
                <Form.Check className="mb-3" controlId="formBasicRadio">
                    <Form.Check.Input 
                        checked={this.props.checked}
                        type="radio"
                        value={this.props.value}
                        id={this.props.id}
                        onChange={()=>{this.handleChange(this.props.holder)}}
                        />
                    <Form.Check.Label htmlFor={this.props.id}>{this.props.tit}</Form.Check.Label>
                </Form.Check>
            </div>
        )
    }
}
