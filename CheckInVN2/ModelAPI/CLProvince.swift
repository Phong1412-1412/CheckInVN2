//
//  CLProvince.swift
//  CheckInVN2
//
//  Created by PPPP on 17/01/2023.
//

import Foundation
import SwiftUI

struct Province: Hashable, Codable, Identifiable  {
    let id: Int
    let provinceName: String
    let description: String
    let image: String
    let favoriteChecked: Int
    
    var imageA: Image{
        Image(image)
    }
}
