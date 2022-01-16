import React, { Component } from 'react';
import Form from 'react-bootstrap/Form';


export default class Selection extends Component {
    handleSelectChange(event){
        this.props.onChange(parseInt(event.target.value))
    }
    render() {
        return (
            <div className="col-xs-11 col-sm-9 col-md-5 col-lg-3 py-3">
            <h4>Doba výpůjčky: </h4>
            <Form>
                <Form.Select value={this.props.value} onChange={(event)=>{this.handleSelectChange(event)}} aria-label="Select count days of borrowing">
                    <option value="5">5 dnů</option>
                    <option value="7">7 dnů</option>
                    <option value="14">14 dnů</option>
                    <option value="28">28 dnů (měsíc)</option>
                </Form.Select>
            </Form>
            </div>
        )
    }
}
