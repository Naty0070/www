import React, { Component } from 'react';
import Form from 'react-bootstrap/Form';
import Button from 'react-bootstrap/Button';
import InputGroup from 'react-bootstrap/InputGroup';

export default class Email extends Component {

    handleClick=()=>{
        this.props.onClick();
    }
    handleChangeEmail=(event)=>{
        this.props.onChange(event);
    }

    render() {
        return (
            <div>
                <Form >
                    <Form.Group className="mb-3" controlId="formBasicEmail">
                        <Form.Label>Zadej emailovou adresu:</Form.Label>
                        <InputGroup>
                            <Form.Control type="email" placeholder="email@snek.cz" value={this.props.value} onChange={(event)=>{this.handleChangeEmail(event)}}/>
                            <Button variant="info" type="submit" onClick={()=>{this.handleClick()}}>
                            Odeslat
                            </Button>
                        </InputGroup>   
                        <Form.Text className="text-muted">
                        Tento email slouží jen pro objednávky.
                        </Form.Text>               
                    </Form.Group>
                </Form>
            </div>
        )
    }
}
