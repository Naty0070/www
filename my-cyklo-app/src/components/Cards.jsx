import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';
import React, { Component } from 'react';

export default class Cards extends Component {
    
  
      handleClick=(bike)=>{
        this.props.onClick(bike)

    };
    render() {
        return (
            <div className={this.props.bike.classes}>
                <Card className="Card">
                <Card.Img variant="top" src={this.props.bike.src}/>
                <Card.Body className="CardBody">
                    <Card.Title >{this.props.bike.value}</Card.Title>
                    <Card.Text>K zapůjčení za {this.props.bike.price},- Kč/den</Card.Text>
                    <Button variant="warning" value={this.props.bike.price} onClick={()=>{this.handleClick(this.props.bike)}}>Půjčit</Button>
                </Card.Body>
                </Card>
            </div>

        )
    }
}