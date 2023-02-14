//
//  CLFamous.swift
//  CheckInVN2
//
//  Created by PPPP on 28/01/2023.
//

import Foundation
import SwiftUI
import MapKit

struct Famous: Hashable, Codable {
    var id: Int
    var id_province: Int
    var name: String
    var description: String
    var address: String
    private var image: String
    var ischecked: Int
    
    var imageName: Image {
        Image(image)
    }
    
    private var coordinates: Coordinates
    var locationCoordinate: CLLocationCoordinate2D {
           CLLocationCoordinate2D(
               latitude: coordinates.latitude,
               longitude: coordinates.longitude)
    }
    
    init(id: Int, id_provice: Int, name: String, description: String, address: String , image: String, ischecked: Int, coordinates: Coordinates) {
        self.id = id
        self.id_province = id
        self.name = name
        self.description = description
        self.address = address
        self.image = image
        self.ischecked = ischecked
        self.coordinates = coordinates
    }
    
    
     struct Coordinates: Hashable, Codable {
        var latitude: Double
        var longitude: Double
    }
}

